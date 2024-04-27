<?php
require_once('./model/clothe.php');
class clotheController
{
    private $clothe;

    public function __construct()
    {
        $this->clothe = new clothe();
    }

    public function getAll()
    {
        $resp = $this->clothe->showAll();
        return $resp;
    }

    public function showAllPurchased()
    {
        $resp = $this->clothe->getAllPurchased();
        return $resp;
    }

    public function getclothe($id)
    {
        $resp = $this->clothe->findById($id);
        return $resp;
    }

    public function buy($id)
    {
        $result = $this->clothe->addToList($id);
        if ($result) {
            // Handle success
        } else {
            // Handle error
        }
    }

    public function destroy()
    {
        $result = $this->clothe->removeAllPurchased();
        if ($result) {
            // Handle success
        } else {
            // Handle error
        }
    }
}
?>