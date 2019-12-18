@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <img src="{{ asset('image/schema.png') }}" alt="schema">
            </div>

            <div class="col-md-6">
                <code>SELECT pt.EMPLOYEE_ID, o.NAME, pt.EXPERIENCE, pt.INTRODUCTION,pt.EDUCATION FROM employees o, translation pt, language l WHERE o.ID = pt.EMPLOYEE_ID AND pt.LANGUAGE_CODE = l.CODE AND o.id = 1</code>
            </div>

            <div class="col-md-6">
                <img src="{{ asset('image/query.png') }}" alt="schema">
            </div>

            <div class="col-md-6">
                <button><a href="downloads/schema.sql">Download SQL File</a></button>
            </div>
        </div>
    </div>

@stop
