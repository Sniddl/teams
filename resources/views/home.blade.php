@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <modal button="Create a Team">
                      <easyform submit="create" :data="{
                        action: '/team/create',
                        method: 'post',
                        input: [
                          {
                            name: 'name',
                            type: 'text'
                          },
                        ]
                      }"></easyform>
                    </modal>

                    <modal button="Join a Team">
                      <easyform submit="create" :data="{
                        action: '/team/join',
                        method: 'post',
                        input: [
                          {
                            name: 'invite code',
                            type: 'text'
                          },
                        ]
                      }"></easyform>
                    </modal>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
