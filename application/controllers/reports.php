<?php
/**
 * User: A. Skomorkhov
 * Date: 03.12.12
 * Time: 16:22
 */
class Reports_Controller extends Base_Controller{
    public $restful = true;
    public function get_index(){
        return View::make('reports.index')->with('users', User::all());
    }
    public function post_view(){
        $date_start = Input::get('Ystart')."-".Input::get('Mstart')."-".Input::get('Dstart');
        $date_end = Input::get('Yend')."-".Input::get('Mend')."-".Input::get('Dend');
        $result['date_start'] = $date_start;
        $result['date_end'] = $date_end;
        $user_id = User::all();
        foreach($user_id as  $user){
            if(Input::get($user->id)==true or Input::get('all_users')==true){
                $result['user'][$user->id]['id'] = $user->id;
                $result['user'][$user->id]['first_name'] = $user->first_name;
                $result['user'][$user->id]['last_name'] = $user->last_name;
                if(Input::get('accounts_check')==true){
                    $result['accounts'][$user->id] = Account::where('created_by', '=', $user->id)
                        ->where('date_entered', '>=', $date_start)
                        ->where('date_entered', '<=', $date_end)
                        ->get();
                }
                if(Input::get('contacts_check')==true){
                    $result['contacts'][$user->id] = Contact::where('created_by', '=', $user->id)
                        ->where('date_entered', '>=', $date_start)
                        ->where('date_entered', '<=', $date_end)
                        ->get();
                }
            }
        }
        //$result = Account::where('created_by', '=', Input::get('3e916df9-afa2-949b-b70c-3c70e6b2bc5e'))->first();
        //$result = Account::where('created_by', '=', '3e916df9-afa2-949b-b70c-3c70e6b2bc5e')->get();
        return View::make('reports.view')->with('results', $result);
    }
}