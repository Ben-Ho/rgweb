<?php
class Acl extends Kwf_Acl_Component
{
    public function __construct()
    {
        parent::__construct();

        $this->add(new Kwf_Acl_Resource_MenuUrl('kwf_user_users',
                array('text'=>trlKwf('Useradministration'), 'icon'=>'user.png'),
                '/kwf/user/users'));
            $this->add(new Zend_Acl_Resource('kwf_user_user'), 'kwf_user_users');
            $this->add(new Zend_Acl_Resource('kwf_user_log'), 'kwf_user_users');
            $this->add(new Zend_Acl_Resource('kwf_user_comments'), 'kwf_user_users');

        $this->addRole(new Kwf_Acl_Role('myrole', trl('My Role')));
        $this->add(new Kwf_Acl_Resource_EditRole('edit_role_myrole', 'myrole'), 'edit_role');
        $this->allow('admin', 'edit_role_myrole');
        $this->allow('admin', 'kwf_user_users');
    }
}
