<?php 
class auth_model extends CI_Model {	
	public function __construct()
	{
        parent::__construct();
	}
 
	function register($username,$password)
	{
		$data_user = array(
			'username'=>$username,
			'password'=>password_hash($password,PASSWORD_DEFAULT),
		);
		$this->db->insert('users',$data_user);
	}

    function login_user($username,$password)
	{
        $query = $this->db->get_where('users',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username',$username);
				$this->session->set_userdata('is_login',TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
	}
	
    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			header('Location: /buat-uprak-2/login');
		}
    }
}
?>