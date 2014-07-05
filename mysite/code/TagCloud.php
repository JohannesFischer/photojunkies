<?php

class TagCloud {
	
	private static $popularities = 0;

	public static function TagsCollection($limit = 10, $sortby = "") {
		$allTags = array();
		$max = 0;
		$container = BlogHolder::get()->First();
		$entries = BlogEntry::get();

		if($entries) {
			foreach($entries as $entry) {
				$theseTags = explode(", ", strtolower(trim($entry->Tags)));
				foreach($theseTags as $tag) {
					if($tag != "") {
						$allTags[$tag] = isset($allTags[$tag]) ? $allTags[$tag] + 1 : 1; //getting the count into key => value map
						$max = ($allTags[$tag] > $max) ? $allTags[$tag] : $max;
					}
				}
			}

			if($allTags) {
				//TODO: move some or all of the sorts to the database for more efficiency
				if($limit > 0){
					uasort($allTags, array('TagCloud', 'column_sort_by_popularity'));	//sort by popularity
					$allTags = array_slice($allTags, 0, $limit,true);
				 }
				 if($sortby == "alphabet"){
					TagCloud::natksort($allTags);
				 }

				$sizes = array();
				foreach ($allTags as $tag => $count) $sizes[$count] = true;

				$offset = 0;
				$numsizes = count($sizes)-1; //Work out the number of different sizes
				$buckets = count(self::$popularities)-1;

				// If there are more frequencies then buckets, divide frequencies into buckets
				if ($numsizes > $buckets) {
					$numsizes = $buckets;
				}
				// Otherwise center use central buckets
				else {
					$offset   = round(($buckets-$numsizes)/2);
				}

				foreach($allTags as $tag => $count) {
					$popularity = round($count / $max * $numsizes) + $offset; $popularity=min($buckets,$popularity);
					$class = self::$popularities[$popularity];

					$allTags[$tag] = array(
						"Tag" => $tag,
						"Count" => $count,
						"Class" => $class,
						"Link" => $container->Link('tag') . '/' . urlencode($tag)
					);
				}
			}

			$output = new ArrayList();
			foreach($allTags as $tag => $fields) {
				$output->push(new ArrayData($fields));
			}
		return $output;
		}

		return;
	}

	/**
	 * Helper method to compare 2 Vars to work out the results.
	 * @param mixed
	 * @param mixed
	 * @return int
	 */
	private static function column_sort_by_popularity($a, $b){
		if($a == $b) {
			$result  = 0;
		}
		else {
			$result = $b - $a;
		}
		return $result;
	}

	private static function natksort(&$aToBeSorted) {
		$aResult = array();
		$aKeys = array_keys($aToBeSorted);
		natcasesort($aKeys);
		foreach ($aKeys as $sKey) {
		    $aResult[$sKey] = $aToBeSorted[$sKey];
		}
		$aToBeSorted = $aResult;

		return true;
	}
}