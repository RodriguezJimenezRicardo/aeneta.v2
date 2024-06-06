<?php

function isAPI(): bool
{
    if (\Request::is('api/*')) {
        return true;
    }

    return false;
}

function isHook(): bool
{
    if (\Request::is('hooks/*')) {
        return true;
    }

    return false;
}

//* Response functions
function notFound(string $message, string $forward_url = null)
{
    if (isAPI() || isHook()) {
        return Response($message, 404);
    } else {
        if (is_null($forward_url)) {
            return back()->withErrors([$message])->withInput();
        }

        return redirect($forward_url)->withErrors([$message])->withInput();
    }
}

function conflict(string $message, string $forward_url = null)
{
    if (isAPI() || isHook()) {
        return Response($message, 409);
    } else {
        if (is_null($forward_url)) {
            return back()->withErrors([$message])->withInput();
        }

        return redirect($forward_url)->withErrors([$message])->withInput();
    }
}

function badRequest(string $message, string $forward_url = null)
{
    if (isAPI() || isHook()) {
        return Response($message, 400);
    } else {
        if (is_null($forward_url)) {
            return back()->withErrors([$message])->withInput();
        }

        return redirect($forward_url)->withErrors([$message])->withInput();
    }
}

function forbidden(string $message, string $forward_url = null)
{
    if (isAPI() || isHook()) {
        return Response($message, 403);
    } else {
        if (is_null($forward_url)) {
            return back()->withErrors([$message])->withInput();
        }

        return redirect($forward_url)->withErrors([$message])->withInput();
    }
}
