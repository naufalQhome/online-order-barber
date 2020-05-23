<?php
class Data_model  extends CI_Model
{

    public function getPaket()
    {
        $query = $this->db->get('paket_cukur');
        return $query->result_array();
    }

    public function s_getPaket($id)
    {

        $this->db->select('*');
        $this->db->from('paket_cukur');
        foreach ($id as $row) {
            $this->db->or_where('id_paket', $row);
        };
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKec()
    {
        $query = $this->db->get('kecamatan');
        return $query->result_array();
    }

    public function s_getKec($id)
    {
        $query = $this->db->get_where('kecamatan', array('id_kec' => $id));
        return $query->row_array();
    }

    public function s_getKec_result($id)
    {
        $query = $this->db->get_where('kecamatan', array('id_kec' => $id));
        return $query->result_array();
    }

    public function getWaktu()
    {
        $query = $this->db->get('waktu_order');
        return $query->result_array();
    }

    public function s_getWaktu($id)
    {
        $query = $this->db->get_where('waktu_order', array('id_waktu' => $id));
        return $query->row_array();
    }

    public function orderCustomer($data = null)
    {
        $query = $this->db->insert('order_customer', $data);
        $affected = $this->db->affected_rows() > 0;
        $insert_id = $this->db->insert_id();
        return array(
            'affected' => $affected,
            'insert_id' => $insert_id,
        );
    }

    public function orderCustomerId($id)
    {
        $query = $this->db->get_where('order_customer', array('id_order' => $id));
        return $query->row_array();
    }

    public function orderCostumerJoin($iddata)
    {
        $id = array('order_customer.id_order' => $iddata);
        $query = $this->db->select('*')
            ->from('order_customer')
            ->join('kecamatan', 'order_customer.tempat_order = kecamatan.id_kec')
            ->where($id)
            ->get();
        return $query->row_array();
    }

    public function updateCustomerId($id)
    {
        $this->db->set('konfirmasi_order', '1');
        $this->db->where('id_order', $id);
        $this->db->update('order_customer');
        $query = $this->db->get_where('order_customer', array('id_order' => $id));
        return $query->row_array();
    }
}
