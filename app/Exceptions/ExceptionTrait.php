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

		if ($this->isModel($e)) {
                  
                  return $this->modelResponse($e);
             }

             if ($this->isHttp($e)) {
                 return $this->httpNotFound($e);
             }
		 
	}






	protected function isModel($e)
	{
		 return $e instanceof ModelNotFoundException;
	}

	protected function isHttp($e)
	{
		return $e instanceof NotFoundHttpException;
	}

	protected function modelResponse($e)
	{
		return response()->json([
                    'error' => 'Product Model Not Found'

                  ],Response::HTTP_NOT_FOUND);
		 
	}
	protected function httpNotFound($e)
	{
		 return response()->json([
                    'error' => 'Route Not Found'

                  ],Response::HTTP_NOT_FOUND);
	}
}


?>