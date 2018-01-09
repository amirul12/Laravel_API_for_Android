<?php

namespace App\Exceptions;
use Exception;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Trait ExceptionTrait
{

	public function apiException($request, $e)
	{

		if ($e instanceof ModelNotFoundException) {
                  return response()->json([
                    'error' => 'Product Model Not Found'

                  ],Response::HTTP_NOT_FOUND);
             }

             if ($e instanceof NotFoundHttpException) {
                  return response()->json([
                    'error' => 'Route Not Found'

                  ],Response::HTTP_NOT_FOUND);
             }
		 
	}
}


?>