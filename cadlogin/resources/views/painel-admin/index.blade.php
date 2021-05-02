@extends('template.painel-admin') <!-- chamando a index do painel -->
@section('title', 'Painel Administrativo')
@section('content')
<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'admin'){ 
  echo "<script language='javascript'> window.location='./' </script>";
}
?> <!--se não for admin, não tem que estra naquela página-->
Home do admin
@endsection