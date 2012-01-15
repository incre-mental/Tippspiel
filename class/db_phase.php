<?php
  include_once 'database.php';
	include_once 'phase.php';
  
  class DB_Phase extends DB_MySQL {
	  
	  public function get (&$currentphase = NULL) {
		  $return       = Array ();
			$parent_phase = NULL;
			
      $sql = 'SELECT parent.id AS parent_id, parent.name AS parent_name, childs.id AS child_id, childs.name AS child_name FROM phasen AS parent ' .
						 'LEFT JOIN phasen AS childs ON childs.parent_id = parent.id ' .
			       ' WHERE parent.parent_id IS NULL ';
			
			if ($currentphase != NULL)
			  $sql = $sql . 'AND (parent.id = ' . $currentphase->getId () . ' OR childs.id = ' . $currentphase->getId () . ')';
					 		
			$this->query ($sql);

			while ($row = $this->fetchRow ()) {		
        if ($currentphase == NULL) {			
					if (!$parent_phase) {
						$phase = new Phase ();
						$parent_phase = $phase;
						$phase->setId   ($row['parent_id']);
						$phase->setName ($row['parent_name']);
					} 
					else {
						if ($parent_phase->getId () != $row['parent_id']) {
							$return [] = $parent_phase;
							$phase = new Phase ();
							$parent_phase = $phase;
							$phase->setId   ($row['parent_id']);
							$phase->setName ($row['parent_name']);  
						}					
					}
				}
				else {
				  $currentphase->setId   ($row['parent_id']);
					$currentphase->setName ($row['parent_name']);
					$parent_phase = &$currentphase;
				}
				
				if ($row['child_id']) {
				  $child = new Phase ();
				 	$child->setId     ($row['child_id']);
					$child->setName   ($row['child_name']);
					$child->setParent ($parent_phase);
					$childs = &$parent_phase->getChilds ();
					$childs [] = $child;
				}
			}
			
			if ($this->count () > 0) {
			  $return [] = $parent_phase;
			}
			
			return $return;
    }	

    public function getCurrent (&$currentphase) {			
      $sql = 'SELECT * FROM phasen WHERE id=' . $currentphase->getId ();
						 				
			$this->query ($sql);

			if ($row = $this->fetchRow ()) {				
				$currentphase->setName ($row ['Name']);
			}
    }			
	}

?>