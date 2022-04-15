<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Mudde\Formgen4Symfony\Annotation\FormField;
use Mudde\Formgen4Symfony\Annotation\Formgen;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
#[Formgen('product',['data'=> ['_type'=>'Api', 'url'=>'api/products'  ], 'languages'=>['nl'], 'buttons'=>[["_type"=> "Submit","label"=> "Opslaan"]], 'builders'=>[["_type"=> "TabBuilder"]]])]
#[ApiResource('Product')]
class Product
{
    /** 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[FormField('id', 'id', [], ['readonly' => true])]
    private ?int $id;

    /**
     * @ORM\Column(type="string")
     */
    #[FormField('name', 'name', [], ['unique'=>true])]
    private string $name = '';

    /**
     * @ORM\ManyToOne(targetEntity=Tax::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    #[FormField('tax', 'tax', [], ['_type'=>'Select2Relation','inputData' => ['_type'=>'api', 'url'=>'api/taxes' ]])]
    private ?Tax $tax;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
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
