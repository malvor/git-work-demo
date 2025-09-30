<?php

require_once 'User.php';
require_once 'config.php';

/**
 * User Profile management class for Git rebase demonstration
 */
class UserProfile
{
    private $profiles = [];

    public function __construct()
    {
        // Initialize with some demo profiles
        $this->profiles = [
            'admin' => [
                'username' => 'admin',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'bio' => 'System administrator',
                'avatar' => 'admin-avatar.jpg',
                'phone' => '+1-555-0001',
                'address' => '123 Admin St, Tech City',
                'preferences' => [
                    'theme' => 'dark',
                    'language' => 'en',
                    'notifications' => true
                ]
            ],
            'john' => [
                'username' => 'john',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'bio' => 'Software developer and tech enthusiast',
                'avatar' => 'john-avatar.jpg',
                'phone' => '+1-555-0002',
                'address' => '456 Developer Ave, Code Town',
                'preferences' => [
                    'theme' => 'light',
                    'language' => 'en',
                    'notifications' => false
                ]
            ]
        ];
    }

    /**
     * Get user profile by username
     */
    public function getProfile($username)
    {
        return isset($this->profiles[$username]) ? $this->profiles[$username] : null;
    }

    /**
     * Update user profile
     */
    public function updateProfile($username, $profileData)
    {
        if (!isset($this->profiles[$username])) {
            return false;
        }

        // Merge new data with existing profile
        $this->profiles[$username] = array_merge($this->profiles[$username], $profileData);
        return true;
    }

    /**
     * Update user preferences
     */
    public function updatePreferences($username, $preferences)
    {
        if (!isset($this->profiles[$username])) {
            return false;
        }

        $this->profiles[$username]['preferences'] = array_merge(
            $this->profiles[$username]['preferences'],
            $preferences
        );
        return true;
    }

    /**
     * Upload user avatar
     */
    public function uploadAvatar($username, $avatarFile)
    {
        if (!isset($this->profiles[$username])) {
            return false;
        }

        // Simulate avatar upload process
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($avatarFile, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedTypes)) {
            return false;
        }

        // Generate unique filename
        $newFilename = $username . '_' . time() . '.' . $fileExtension;
        $this->profiles[$username]['avatar'] = $newFilename;

        return $newFilename;
    }

    /**
     * Get user's full name
     */
    public function getFullName($username)
    {
        $profile = $this->getProfile($username);
        if (!$profile) {
            return null;
        }

        return trim($profile['first_name'] . ' ' . $profile['last_name']);
    }

    /**
     * Search profiles by criteria
     */
    public function searchProfiles($criteria)
    {
        $results = [];

        foreach ($this->profiles as $username => $profile) {
            $match = false;

            // Search in name fields
            if (isset($criteria['name'])) {
                $fullName = strtolower($this->getFullName($username));
                if (strpos($fullName, strtolower($criteria['name'])) !== false) {
                    $match = true;
                }
            }

            // Search in bio
            if (isset($criteria['bio'])) {
                if (strpos(strtolower($profile['bio']), strtolower($criteria['bio'])) !== false) {
                    $match = true;
                }
            }

            if ($match) {
                $results[] = $profile;
            }
        }

        return $results;
    }
}