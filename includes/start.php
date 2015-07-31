<?php $serverName = $_SERVER['SERVER_NAME'];

$base_url = '';

if( $serverName == 'laravelbackend.dev' )
{
    $base_url = 'http://laravelbackend.dev';
}
else
{
    $base_url = 'http://laravelbackend.com';
}