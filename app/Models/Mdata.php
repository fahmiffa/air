<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class Mdata extends Model
{


  function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function safe($data, $table)
  {
    $builder = $this->db->table($table);
    return $builder->insert($data);
  }


  public function dset($data, $table, $where)
  {
    $builder = $this->db->table($table);
    $builder->Where($where);
    return $builder->update($data);
  }


  public function cj($where, $table)
  {
    $builder = $this->db->table($table);
    $query = $builder->getWhere($where);
    return $query->getFieldCount();
  }


  public function join_sum($table, $sama, $where, $sum)
  {
    $builder = $this->db->table($table[0]);
    $builder->select('*');
    if (count($sum) != 0) {
      for ($x = 0; $x < count($sum); $x++) {
        $builder->selectSum($sum[$x]);
      }
    }

    if ($where != 0) {
      $builder->Where($where);
    }
    $gb = count($sama);
    for ($i = 1; $i < $gb; $i++) {
      $builder->join($table[$i], $sama[$i]);
    }
    return $query = $builder->get()->getResult();
  }


  public function inbatch($data, $table)
  {
    $builder = $this->db->table($table);
    return $builder->insertBatch($data);
  }



  public function view($table)
  {
    $builder = $this->db->table($table);
    $query =  $builder->get();
    return $query->getResult();
  }

  public function cc($where, $table)
  {
    $builder = $this->db->table($table);
    $query = $builder->getWhere($where)->getResult();

    if (count($query) < 1) {
      return false;
    } else {
      return $query;
    }
  }

  public function cr($where, $table)
  {
    $builder = $this->db->table($table);
    $query = $builder->getWhere($where)->getResultArray();

    if (count($query) < 1) {
      return false;
    } else {
      $q = $builder->getWhere($where)->getRow();
      return $q;
    }
  }

  public function co($where, $table)
  {
    $builder = $this->db->table($table);
    $builder->orderBy('notif_time', 'DESC');
    $query = $builder->getWhere($where)->getResult();

    if (count($query) < 1) {
      return $query;
    } else {
      return $query;
    }
  }

  public function cv($where, $table)
  {
    $builder = $this->db->table($table);
    if ($where != 0) {
      $builder->Where($where);
    }
    $query =  $builder->get();
    return $query->getResult();
  }

  public function cn($where, $table)
  {
    $builder = $this->db->table($table);
    if ($where != 0) {
      $builder->Where($where);
    }
    return $builder->countAll();
  }

  public function jn($where, $table, $sum)
  {
    $builder = $this->db->table($table);
    if (count($sum) != 0) {
      for ($x = 0; $x < count($sum); $x++) {
        $builder->selectSum($sum[$x]);
      }
    }
    if ($where != 0) {
      $builder->Where($where);
    }
    return $query = $builder->get()->getResult();
  }

  public function dc($where, $table)
  {
    $builder = $this->db->table($table);
    $builder->Where($where);
    $query = $builder->get()->getResult();

    if (count($query) < 1) {
      return false;
    } else {
      return $builder->delete($where);
    }
  }

  //update
  public function ud($where, $table, $data)
  {
    $builder = $this->db->table($table);
    $builder->update($data, $where);
  }

  // delete
  public function dl($where, $table)
  {
    $builder = $this->db->table($table);
    return $builder->delete($where);
  }


  // join
  public function join($table, $sama, $where)
  {
    $builder = $this->db->table($table[0]);
    $builder->select('*');
    if ($where != 0) {
      $builder->Where($where);
    }
    $gb = count($sama);
    for ($i = 1; $i < $gb; $i++) {
      $builder->join($table[$i], $sama[$i]);
    }
    return $query = $builder->get()->getResult();
  }


  // join or
  public function join_or($table, $sama, $where, $or)
  {
    $builder = $this->db->table($table[0]);
    $builder->select('*');
    if ($where != 0) {
      $builder->Where($where);
    }
    $builder->orWhere($or);
    $gb = count($sama);
    for ($i = 1; $i < $gb; $i++) {
      $builder->join($table[$i], $sama[$i], 'left');
    }
    return $query = $builder->get()->getResult();
  }


  // join gruup
  public function joing($table, $sama, $where, $group)
  {
    $builder = $this->db->table($table[0]);
    $builder->select('*');
    if ($where != 0) {
      $builder->Where($where);
    }
    $gb = count($sama);
    for ($i = 1; $i < $gb; $i++) {
      $builder->join($table[$i], $sama[$i]);
    }
    $builder->groupBy($group);

    return $query = $builder->get()->getResult();
  }


  public function joinc($table, $sama, $where, $g)
  {
    $builder = $this->db->table($table[0]);
    $builder->select('*');
    $builder->select('COUNT(sales_id) as count');
    if ($where != 0) {
      $builder->Where($where);
    }
    $gb = count($sama);
    for ($i = 1; $i < $gb; $i++) {
      $builder->join($table[$i], $sama[$i]);
    }
    $builder->groupBy($g);
    return $query = $builder->get()->getResult();
  }


  public function joincs($table, $sama, $where, $c, $sum)
  {
    $builder = $this->db->table($table[0]);
    $builder->select('*');
    $builder->select('COUNT(' . $c . ') as count');
    if (count($sum) != 0) {
      for ($x = 0; $x < count($sum); $x++) {
        $builder->selectSum($sum[$x]);
      }
    }
    if ($where != 0) {
      $builder->Where($where);
    }
    $gb = count($sama);
    for ($i = 1; $i < $gb; $i++) {
      $builder->join($table[$i], $sama[$i]);
    }
    return $query = $builder->get()->getResult();
  }
}
