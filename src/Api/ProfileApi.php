<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Api;

use Etrias\CopernicaConnector\Model\CreateProfileRequest;
use Etrias\CopernicaConnector\Model\CreateSubProfileRequest;
use Etrias\CopernicaConnector\Model\Profile;
use Etrias\CopernicaConnector\Model\ProfilesRequest;
use Etrias\CopernicaConnector\Model\ProfilesResponse;
use Etrias\CopernicaConnector\Model\ProfileSubProfilesRequest;
use Etrias\CopernicaConnector\Model\SubProfile;
use Etrias\CopernicaConnector\Model\SubProfilesResponse;
use Etrias\CopernicaConnector\Model\UpdateSubProfileFieldsRequest;
use GuzzleHttp\Psr7\Uri;

class ProfileApi extends AbstractApi
{
    /**
     * @return Profile[]
     */
    public function search(ProfilesRequest $request): iterable
    {
        $uri = $this->createUri('/database/{databaseId}/profiles', [
            'databaseId' => $request->getDatabaseId(),
        ], [
            'total' => $request->isTotal(),
            'limit' => $request->getLimit(),
            'orderby' => $request->getOrderBy(),
            'dataonly' => $request->isDataOnly(),
            'fields' => $request->getFields(),
        ]);

        $start = $request->getStart();

        do {
            $uri = Uri::withQueryValue($uri, 'start', $start);
            /** @var ProfilesResponse $result */
            $result = $this->deserialize($this->getJson($uri), ProfilesResponse::class);
            $data = $result->getData();

            yield from $data;

            if (!$data || $result->getCount() < $result->getLimit()) {
                break;
            }

            $start += $request->getLimit();
        } while (true);
    }

    public function create(CreateProfileRequest $request): string
    {
        $uri = $this->createUri('/database/{databaseId}/profiles', [
            'databaseId' => $request->getDatabaseId(),
        ]);

        $response = $this->postJson($uri, [
            'fields' => $request->getFields(),
            'interests' => $request->getInterests(),
        ]);

        return $response->getHeaderLine('x-created');
    }

    public function delete(string $profileId): void
    {
        $uri = $this->createUri('/profile/{profileId}', [
            'profileId' => $profileId,
        ]);

        $this->client->delete($uri);
    }

    /**
     * @return SubProfile[]
     */
    public function allSubProfiles(ProfileSubProfilesRequest $request): iterable
    {
        $uri = $this->createUri('/profile/{profileId}/subprofiles/{collectionId}', [
            'profileId' => $request->getProfileId(),
            'collectionId' => $request->getCollectionId(),
        ], [
            'total' => $request->isTotal(),
            'limit' => $request->getLimit(),
        ]);
        $start = $request->getStart();

        do {
            $uri = Uri::withQueryValue($uri, 'start', $start);
            /** @var SubProfilesResponse $result */
            $result = $this->deserialize($this->getJson($uri), SubProfilesResponse::class);
            $data = $result->getData();

            yield from $data;

            if (!$data || $result->getCount() < $result->getLimit()) {
                break;
            }

            $start += $request->getLimit();
        } while (true);
    }

    public function createSubProfile(CreateSubProfileRequest $request): void
    {
        $uri = $this->createUri('/profile/{profileId}/subprofiles/{collectionId}', [
            'profileId' => $request->getProfileId(),
            'collectionId' => $request->getCollectionId(),
        ]);

        $this->postJson($uri, $request->getFields());
    }

    public function updateSubProfileFields(UpdateSubProfileFieldsRequest $request): void
    {
        $uri = $this->createUri('/subprofile/{subProfileId}/fields', [
            'subProfileId' => $request->getSubProfileId(),
        ]);

        $this->putJson($uri, $request->getFields());
    }
}
