<?php


function getResponse()
{

    return new \Phalcon\Http\Response();
}

/**
 * 获取DI
 *
 * @return \Phalcon\DiInterface
 */
function getDI()
{
    return    \Phalcon\DI::getDefault();
}

function request()
{
    return getDI()->get("request");
}

function getRequestJson()
{
    return (array) getDI()->get("request")->getJsonRawBody();
}


/**
 * 成功返回
 *
 * @param  array $data
 * @return mixed
 */
function SuccessResponse($data = array())
{
    return getResponse()->setJsonContent(
        [
            "code" => "200",
            "message"=>"success",
            "data" => $data
        ]
    );
}

/**
 * 失败返回
 *
 * @return mixed
 */
function ErrorResponse($data,$code,$message)
{
    return getResponse()->setJsonContent(
        [
            "code" => $code,
            "message" => $message,
            "data" => $data

        ]
    );
}
