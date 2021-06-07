@extends('errors::minimal')

@section('title', __('Prohibido'))
@section('code', '403')
@section('message', __('EL USUARIO NO TIENE LAS FUNCIONES ADECUADAS.' ?: 'Forbidden'))
