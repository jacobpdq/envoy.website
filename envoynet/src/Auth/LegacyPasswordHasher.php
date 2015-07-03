<?php
namespace App\Auth;

use Cake\Auth\AbstractPasswordHasher;

use Cake\Core\Configure;
use Cake\Utility\Security;

class LegacyPasswordHasher extends AbstractPasswordHasher
{

    public function hash($password) {

        $password = Security::salt() . $password;

        return sha1($password);
    }

/**
 * Check hash. Generate hash for user provided password and check against existing hash.
 *
 * @param string $password Plain text password to hash.
 * @param string $hashedPassword Existing hashed password.
 * @return bool True if hashes match else false.
 */
    public function check($password, $hashedPassword) {
        
        return $hashedPassword === $this->hash($password);
    }
}

?>