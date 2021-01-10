<?php 
session_start(); 

function generateRecommendation($userid)
{
    $socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

    if (!$socket)
    {
        die(socket_strerror(socket_last_error($socket)));
    } 

    if (!socket_connect($socket,gethostbyname('labit601.upct.es'),11111))
    {
        die(socket_strerror(socket_last_error($socket)));
    }

    if (!socket_bind($socket,$_SERVER['SERVER_ADDR']))
    {
        die(socket_strerror(socket_last_error($socket)));
    }

    $ok = true;


    $path = "/var/www/html/proyecto/matlab\r\n";
    $fun = "filtering(".$userid.")\r\n";
    $info = $path.$fun.$chr(0);
    $sent = socket_write($socket, $info, strlen($info));

    if (!$sent)
    {
        echo socket_strerror(socket_last_error($socket));
        $ok = false;
    }

    socket_close($socket);
    return $success;
}

// terminar
function idsRecomendations($userid)
{
    $recommendations = generateRecommendation($userid);
    $idsRecommended = getIdsRecs($userid);
    return $idsRecommended;
}
?>