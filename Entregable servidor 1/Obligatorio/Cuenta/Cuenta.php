<?php
class Cuenta
{
    public string $nombreCliente;
    public string $numeroDeCuenta;
    public float $tipoDeInteres;
    public float $saldo;

    public function __construct(string $nombreCliente, string $numeroDeCuenta, $tipoDeInteres, $saldo)
    {
        $this->nombreCliente = $nombreCliente;
        $this->numeroDeCuenta = $numeroDeCuenta;
        $this->tipoDeInteres = $tipoDeInteres;
        $this->saldo = $saldo;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }

    public function ingreso($cuantia)
    {
        if ($cuantia < 0) {
            return false;
        }
        $this->saldo += $cuantia;
        return true;
    }

    public function reintegro($cuantia)
    {
        if ($this->saldo < $cuantia) {
            return false;
        }

        $this->saldo -= $cuantia;
        return true;
    }
    public function transferencia(Cuenta $receptor, float $cuantia)
    {
        $success = true;
        $success = $this->reintegro($cuantia);
        if ($success) {
            $success = $receptor->ingreso($cuantia);
            if (!$success) {
                $this->ingreso($cuantia);
            }
        }
        return $success;
    }
}

?>