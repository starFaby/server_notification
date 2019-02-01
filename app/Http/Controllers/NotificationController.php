<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class NotificationController extends Controller
{
    function createNotification(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataNotification = $data['notification'];
            $dataUser = $data['user'];
            $user = User::where('user_id', $dataUser['id'])->first();
            $response = $notification->offers()->create([
                'notificate' => strtoupper($dataNotification ['code'])                 
            ]);
            return response()->json($response, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException  $e) {
            return response()->json($e, 405);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }
    function showNotification($status)
    {
        try {
            $notification = Notification::where('status', $status)->first();
            return response()->json(['notification' => $notification], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException  $e) {
            return response()->json($e, 405);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }
}
