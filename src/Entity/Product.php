<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Mudde\Formgen4Symfony\Annotation\FormField;
use Mudde\Formgen4Symfony\Annotation\Formgen;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
#[Formgen('product',[])]
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[FormField('id', 'id', [], ['readonly' => true])]
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    #[FormField('name', 'name', [], ['unique'=>true])]
    private $name = '';

    /**
     * @ORM\ManyToOne(targetEntity=Tax::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    #[FormField('tax', 'tax', [], ['_type'=>'Select2Relation', 'target'=>Tax::class])]
    private $tax;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?array
    {
        return $this->name;
    }

    public function setName(array $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTax(): ?Tax
    {
        return $this->tax;
    }

    public function setTax(?Tax $tax): self
    {
        $this->tax = $tax;

        return $this;
    }
}
