<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="ItemRepository")
 * @ORM\Table()
 */
class Item
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_src;

    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Category", inversedBy="items")
     */
    private $category;

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }
    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }
    public function getPrice() { return $this->price; }
    public function setPrice($price) { $this->price = $price; }
    public function getImageSrc() { return $this->image_src; }
    public function setImageSrc($image_src) { $this->image_src = $image_src; }
    /** @return Category  */
    public function getCategory() { return $this->category; }
    public function setCategory(Category $category) { $this->category = $category; }
}