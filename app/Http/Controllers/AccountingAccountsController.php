<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\AccountingAccountRepository;
use SisConPat\Repositories\AccountTypeRepository;
use SisConPat\Repositories\AccountBalanceTypeRepository;
use SisConPat\Repositories\AccountCoverageTypeRepository;


class AccountingAccountsController extends Controller
{
    private $accounting_accountRepository;
    private $account_typeRepository;
    private $account_balance_typeRepository;
    private $account_coverage_typeRepository;

    public function __construct(AccountingAccountRepository $accounting_accountRepository, AccountTypeRepository $account_typeRepository, AccountBalanceTypeRepository $account_balance_typeRepository, AccountCoverageTypeRepository $account_coverage_typeRepository)
    {
        $this->accounting_accountRepository = $accounting_accountRepository;
        $this->account_typeRepository = $account_typeRepository;
        $this->account_balance_typeRepository = $account_balance_typeRepository;
        $this->account_coverage_typeRepository = $account_coverage_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accounting_accounts = $this->accounting_accountRepository->allAccountingAccountsByCode();
        #dd($accounting_accounts);
        return view('accounting_accounts.index', compact('accounting_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(AccountingAccountRepository $accounting_accountRepository, AccountTypeRepository $account_typeRepository, AccountBalanceTypeRepository $account_balance_typeRepository, AccountCoverageTypeRepository $account_coverage_typeRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccounts()
            ->lists('code_description', 'id')
            ->all();

        $account_types = array(''=>'') + $account_typeRepository
            ->allAccountTypes()
            ->lists('description', 'id')
            ->all();

        $account_balance_types = array(''=>'') + $account_balance_typeRepository
            ->allAccountBalanceTypes()
            ->lists('description', 'id')
            ->all();

        $account_coverage_types = array(''=>'') + $account_coverage_typeRepository
            ->allAccountCoverageTypes()
            ->lists('description', 'id')
            ->all();

        return view('accounting_accounts.create', compact('accounting_accounts', 'account_types', 'account_balance_types', 'account_coverage_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\AccountingAccountRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['code_short'] = strtoupper($input['code_short']);
        $input['description'] = strtoupper($input['description']);
        
        $accounting_account = $this->accounting_accountRepository->storeAccountingAccount($input);

        return redirect('accounting_accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $accounting_account = $this->accounting_accountRepository->findAccountingAccountById($id);
        $logs = $accounting_account->revisionHistory;

        return view('accounting_accounts.show', compact('accounting_account', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, AccountingAccountRepository $accounting_accountRepository, AccountTypeRepository $account_typeRepository, AccountBalanceTypeRepository $account_balance_typeRepository, AccountCoverageTypeRepository $account_coverage_typeRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeIdExceptionId(1, $id)
            ->lists('code_description', 'id')
            ->all();

        $account_types = array(''=>'') + $account_typeRepository
            ->allAccountTypes()
            ->lists('description', 'id')
            ->all();

        $account_balance_types = array(''=>'') + $account_balance_typeRepository
            ->allAccountBalanceTypes()
            ->lists('description', 'id')
            ->all();

        $account_coverage_types = array(''=>'') + $account_coverage_typeRepository
            ->allAccountCoverageTypes()
            ->lists('description', 'id')
            ->all();
    
        $accounting_account = $this->accounting_accountRepository->findAccountingAccountById($id);
        
        return view('accounting_accounts.edit', compact('accounting_account', 'accounting_accounts', 'account_types', 'account_balance_types', 'account_coverage_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\AccountingAccountRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['code_short'] = strtoupper($input['code_short']);
        $input['description'] = strtoupper($input['description']);

        $accounting_account = $this->accounting_accountRepository->findAccountingAccountById($id);
        $accounting_account->update($input);

        return redirect('accounting_accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByAccountingAccountId($id)->count()>0)
        {
           return redirect('accounting_accounts')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->accounting_accountRepository->findAccountingAccountById($id)->delete();

        return redirect('accounting_accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->accounting_accountRepository->withTrashed()->findAccountingAccountById($id)->restore();

        return redirect('accounting_accounts');
    }
}
