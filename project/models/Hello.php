<?php
	namespace Project\Models;
	use \Core\Model;
	
	class Hello extends Model
	{
		public function getAllWorks()
		{
			return $this->findMany("SELECT * FROM statistics WHERE staff=167 AND status=1");
		}

		public function getDateStartEnd()
		{
			return $this->findMany("SELECT created,start,end FROM statistics WHERE staff=167 AND status=0");
		}

		public function getPrice()
		{
			return $this->findMany("SELECT s.created,s.work,s.room,type,price,s.bed,s.towels FROM statistics s JOIN rooms r ON s.room=r.id JOIN prices p ON r.type=p.room_type WHERE s.room=r.id AND s.work=p.work");
		}

		public function getDayPrice($day)
		{
			return $this->findMany("SELECT s.created,s.work,s.room,s.bed,s.towels,s.start,s.end,b.name,r.type,price,w.name AS workn FROM statistics s JOIN rooms r ON s.room=r.id JOIN builds b ON r.build=b.id JOIN works w ON s.work=w.id JOIN prices p ON r.type=p.room_type WHERE s.room=r.id AND s.work=p.work AND DATE(s.created)='$day'");
		}
	}
