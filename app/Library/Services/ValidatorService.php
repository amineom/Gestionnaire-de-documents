<?php
namespace App\Library\Services;
  
class ValidatorService
{
    public function StoreDocument ($document1)
    {
			$nomfichier = $document1->getClientOriginalName();
            $document1->storeAs('public\upload', $nomfichier);
    }
}