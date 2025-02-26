class Solution {  
    private function kadane($nums) {  
        $n = count($nums);  
        $currsum = 0;  
        $maxtillnow = PHP_INT_MIN;  
        
        for ($x = 0; $x < $n; $x++) {  
            $currsum += $nums[$x];  
            $maxtillnow = max($maxtillnow, $currsum);  
            if ($currsum < 0) {  
                $currsum = 0;  
            }  
        }  
        
        return $maxtillnow;  
    }  
    
    public function maxAbsoluteSum($nums) {  
        $pos = $this->kadane($nums);  
        
        for ($x = 0; $x < count($nums); $x++) {  
            $nums[$x] *= -1;  
        }  
        
        $neg = $this->kadane($nums);  
        
        return max($pos, abs($neg));
    }  
}
