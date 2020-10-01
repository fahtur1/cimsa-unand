@extends('layouts/adminlayout')
@section('content')
<div id="wrapper">
    <div id="page-wrapper" style="height: 100%;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Reset Account</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        Your Account
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        {!! Form::open(['url'=> 'admin/reset', 'method'=>'post', 'class'=>'clearfix','files' => 'true']) !!}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="form-group">
                                {!! Form::email('email', $user->email, [
                                    "class" => "form-control {{ $errors->has('email') ? 'is-invalid' ? 'is-valid' }}",
                                    "placeholder" => "E-mail",
                                    "required"
                                ]) !!}
                                {!! $errors->first("email", "<div class='invalid-feedback'>:message</div>") !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', [
                                    "class" => "form-control {{ $errors->has('password') ? 'is-invalid' ? 'is-valid' }}",
                                    "placeholder" => "New Password",
                                    "required"
                                ]) !!}
                                {!! $errors->first("password", "<div class='invalid-feedback'>:message</div>") !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', [
                                    "class" => "form-control {{ $errors->has('confpassword') ? 'is-invalid' ? 'is-valid' }}",
                                    "placeholder" => "Confirmation Password",
                                    "required"
                                ]) !!}
                                {!! $errors->first("Confirmation Password", "<div class='invalid-feedback'>:message</div>") !!}
                            </div>
                            {!! Form::submit('Submit', ['class'=>'btn btn-success btn-submit']) !!}
                        {!! Form::close() !!}          
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection
@section('script')
    <script>

    </script>
@endsection