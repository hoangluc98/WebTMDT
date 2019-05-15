<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $contacts = Contact::with('user:id,name,email')->paginate(10);

        $viewData = [
            'contacts' => $contacts
        ];

        return view('admin::contact.index',$viewData);
    }

    public function action($action,$id){
        if($action){
            $contact = Contact::find($id);
            $message = '';
            switch ($action) {
                case 'active':
                    $contact->c_status = !$contact->c_status;
                    $contact->save();
                    $message = 'Thay đổi trạng thái thành công';
                    break;
                default:
                    # code...
                    break;
            }
        }

        return redirect()->back()->with('success',$message);
    }
}
