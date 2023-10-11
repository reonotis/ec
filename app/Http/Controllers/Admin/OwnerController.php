<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Models\Owner;
use App\Consts\SessionConst;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOwnerRequest;
use App\Services\OwnerService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Mail;

class OwnerController extends Controller
{
    /** @var OwnerService $ownerService */
    private OwnerService $ownerService;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->ownerService = app(OwnerService::class);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $owner_search = $this->makeOwnerSearchDefaultValue();
        return View('admin.owner.search')->with([
            'search' => $owner_search,
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {
        // 検索実行
        $array_where = [];
        if(!is_null($request->name)) $array_where['name'] = $request->name;
        if(!is_null($request->email)) $array_where['email'] = $request->email;
        $owners = $this->ownerService->getOwnersByParam($array_where);

        $owner_search = $this->makeOwnerSearchDefaultValue($request);
        return View('admin.owner.search')->with([
            'search' => $owner_search,
            'owners' => $owners,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return View('admin.owner.create')->with([
        ]);
    }

    /**
     * @param CreateOwnerRequest $request
     * @return RedirectResponse
     */
    public function store(CreateOwnerRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $password = '123456789'; // TODO

            // 登録処理
            $param = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
            ];
            $owner = $this->ownerService->insert($param);

            // メール送信
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'url' => route('owner.top'),
            ];
            $from = env('MAIL_FROM_ADDRESS');
            Mail::send('emails.admin.create_owner', $data,  function ($message) use($request, $from){
                $message->to($request->email)
                    ->from($from)
                    ->bcc('fujisawareon@yahoo.co.jp')
                    ->subject('ECのオーナーとして登録されました');
            });

            DB::commit();
            return redirect()->route('admin.owner.index')->with(SessionConst::FLASH_MESSAGE_SUCCESS, ['新しいオーナーを登録しました。']);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(' msg:' . $e->getMessage());
            return redirect()->back()->with(SessionConst::FLASH_MESSAGE_ERROR, ['新しいオーナーの登録に失敗しました'])->withInput();
        }
    }

    /**
     * @param Owner $owner
     * @return View
     */
    public function show(Owner $owner): View
    {
        return View('admin.owner.show')->with([
            'owner' => $owner,
        ]);
    }

    /**
     * @param Request|null $request
     * @return null[]
     */
    private function makeOwnerSearchDefaultValue(Request $request = null): array
    {
        $owner_search = [
            'name' => null,
            'email' => null,
        ];

        if(isset($request->name)) $owner_search['name'] = $request->name;
        if(isset($request->email)) $owner_search['email'] = $request->email;

        return $owner_search;
    }
}
