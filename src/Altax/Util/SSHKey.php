<?php
namespace Altax\Util;

/**
 * Utility class for ssh key file.<?php
namespace Altax\Module\Server\Resource;
/**
* KeyPassphraseMap is a mapping table SSH key path and passphrase.
*/
class KeyPassphraseMap
{
private static $instance = null;
protected $map = array();
public static function getSharedInstance()
{
if (!self::$instance) {
self::$instance = new KeyPassphraseMap();
}
return self::$instance;
}
public function setPassphraseAtKey($keyPath, $passphrase)
{
$this->map[realpath($keyPath)] = $passphrase;
return $this;
}
public function getPassphraseAtKey($keyPath)
{
if (!array_key_exists(realpath($keyPath), $this->map)) {
return null;
}

return $this->map[realpath($keyPath)];
}
public function hasPassphraseAtKey($keyPath)
{
if ($this->getPassphraseAtKey($keyPath) === null) {
return false;
} else {
return true;
}
}
}
 */
class SSHKey
{
    /**
     * Checking if the keyfile has passphrase. 
     * 
     * see http://superuser.com/questions/201003/checking-ssh-keys-have-passphrases
     * 
     * @param  string  $keyFile SSH key file data
     * @return boolean
     */
    public static function hasPassphrase($keyFile)
    {
        if (preg_match("/Proc-Type.+ENCRYPTED/", $keyFile) === 1) {
            return true;
        } else {
            return false;
        }
    }
}
