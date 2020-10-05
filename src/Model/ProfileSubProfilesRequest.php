<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class ProfileSubProfilesRequest
{
    use CollectionRequestTrait;

    protected ?string $profileId = null;
    protected ?string $collectionId = null;

    public function getProfileId(): ?string
    {
        return $this->profileId;
    }

    public function setProfileId(?string $profileId): self
    {
        $this->profileId = $profileId;

        return $this;
    }

    public function getCollectionId(): ?string
    {
        return $this->collectionId;
    }

    public function setCollectionId(?string $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }
}
