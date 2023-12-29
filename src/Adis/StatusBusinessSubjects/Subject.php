<?php declare(strict_types=1);

namespace h4kuna\Ares\Adis\StatusBusinessSubjects;

use stdClass;

final class Subject
{
    public bool $exists;

    public string $type;

    public string $tin;

    public ?bool $reliable;

    public bool $isVatPayer;

    public string $taxOfficeNumber;

    public ?stdClass $address;

    public function __construct(
		bool $exists,
		string $type,
		string $tin,
		?bool $reliable,
		bool $isVatPayer,
		string $taxOfficeNumber,
		?stdClass $address
	)
	{
        $this->address = $address;
        $this->taxOfficeNumber = $taxOfficeNumber;
        $this->isVatPayer = $isVatPayer;
        $this->reliable = $reliable;
        $this->tin = $tin;
        $this->type = $type;
        $this->exists = $exists;
    }
}
