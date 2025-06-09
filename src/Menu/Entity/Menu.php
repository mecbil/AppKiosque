<?php

namespace App\Menu\Entity;

use App\Menu\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[Vich\Uploadable] // 👈 Activation de VichUploader sur cette entité
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(type: 'integer')]
    private ?int $position = null;

    // 🆕 Champ utilisé uniquement pour l'upload via formulaire (non mappé en base)
    #[Vich\UploadableField(mapping: 'menu_image', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    // 🆕 Date de mise à jour nécessaire pour que VichUploader détecte les changements
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label; // ✅ Correction ici, tu avais écrit "$this->lanel"
        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): static
    {
        $this->imageName = $imageName;
        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;
        return $this;
    }

    // ✅ Getter & Setter pour le fichier image (utilisé par VichUploader)
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if ($imageFile !== null) {
            $this->updatedAt = new \DateTimeImmutable(); // Met à jour la date si un nouveau fichier est uploadé
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    // ✅ Getter & Setter pour updatedAt (requis par VichUploader)
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
