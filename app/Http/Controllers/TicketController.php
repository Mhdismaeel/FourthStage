<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Helper\Success;
use App\Actions\Helper\Fail;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
Use App\Actions\Ticket\DeleteTicketAction;
Use App\Actions\Ticket\GetAllTicketsAction;
Use App\Actions\Ticket\GetTicketDetailsAction;
Use App\Actions\Ticket\StoreNewTicketAction;
Use App\Actions\Ticket\UpdateTicketAction;
Use App\Actions\Ticket\GetArchiveTicketAction;
Use App\Actions\Ticket\ArchiveTicketAction;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetAllTicketsAction::execute();
        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

        }
    }


    public function GetArchiveTicket()
    {
        $response=GetArchiveTicketAction::execute();
        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

        }
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $response=StoreNewTicketAction::execute($request);
        if($response)
        {
            return Success::execute('Record Created',$response,2001);

        }
        else
        {
            return Fail::execute('Record can not be created',$response,3001);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $response=GetTicketDetailsAction::execute($slug);
        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, $slug)
    {
        $response=UpdateTicketAction::execute($request,$slug);

        if($response)
        {
            return Success::execute('Record Updated',$response,2002);

        }
        else
        {
            return Fail::execute('Record can not be updated',$response,3002);

        }
    }


    public function ArchiveTicket($slug)
    {
        $response=ArchiveTicketAction::execute($slug);

        if($response)
        {
            return Success::execute('Record Updated',$response,2002);

        }
        else
        {
            return Fail::execute('Record can not be updated',$response,3002);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $response=DeleteTicketAction::execute($slug);

        if($response)
        {
            return Success::execute('Record Deleted',$response,2003);

        }
        else
        {
            return Fail::execute('Record can not be deleted',$response,3003);

        }
    }
}
