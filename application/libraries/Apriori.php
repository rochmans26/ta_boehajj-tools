<?php
class Apriori extends CI_Model
{

    public function run($transactions, $support_threshold, $confidence_threshold)
    {
        // Convert transactions to itemsets
        $itemsets = $this->generate_itemsets($transactions);

        // Generate frequent itemsets
        $frequent_itemsets = $this->generate_frequent_itemsets($itemsets, $transactions, $support_threshold);

        // Generate association rules
        $rules = $this->generate_rules($frequent_itemsets, $transactions, $confidence_threshold);

        return ['frequent_itemsets' => $frequent_itemsets, 'rules' => $rules];
    }

    private function generate_itemsets($transactions)
    {
        $itemsets = [];
        foreach ($transactions as $transaction) {
            foreach ($transaction as $item) {
                if (!isset($itemsets[1][$item])) {
                    $itemsets[1][$item] = 1;
                } else {
                    $itemsets[1][$item]++;
                }
            }
        }
        return $itemsets;
    }

    private function generate_frequent_itemsets($itemsets, $transactions, $support_threshold)
    {
        $frequent_itemsets = [];
        foreach ($itemsets[1] as $item => $count) {
            if ($count / count($transactions) >= $support_threshold) {
                $frequent_itemsets[1][$item] = $count;
            }
        }
        // Generate higher-order frequent itemsets
        $k = 1;
        while (!empty($frequent_itemsets[$k])) {
            $k++;
            $candidates = $this->generate_candidates(array_keys($frequent_itemsets[$k - 1]), $k);
            foreach ($candidates as $candidate) {
                $count = 0;
                foreach ($transactions as $transaction) {
                    if ($this->is_subset($candidate, $transaction)) {
                        $count++;
                    }
                }
                if ($count / count($transactions) >= $support_threshold) {
                    $frequent_itemsets[$k][implode(',', $candidate)] = $count;
                }
            }
        }
        return $frequent_itemsets;
    }

    private function generate_candidates($items, $k)
    {
        $candidates = [];
        $num_items = count($items);
        for ($i = 0; $i < $num_items; $i++) {
            for ($j = $i + 1; $j < $num_items; $j++) {
                $candidate = array_unique(array_merge(explode(',', $items[$i]), explode(',', $items[$j])));
                sort($candidate);
                if (count($candidate) == $k) {
                    $candidates[] = $candidate;
                }
            }
        }
        return $candidates;
    }

    private function is_subset($subset, $set)
    {
        return count(array_intersect($subset, $set)) == count($subset);
    }

    private function generate_rules($frequent_itemsets, $transactions, $confidence_threshold)
    {
        $rules = [];
        foreach ($frequent_itemsets as $k => $itemsets) {
            if ($k > 1) {
                foreach ($itemsets as $itemset => $count) {
                    $items = explode(',', $itemset);
                    $subsets = $this->get_subsets($items);
                    foreach ($subsets as $subset) {
                        $antecedent = $subset;
                        $consequent = array_diff($items, $subset);
                        if (!empty($consequent)) {
                            $antecedent_count = $this->get_count($antecedent, $frequent_itemsets);
                            $confidence = $count / $antecedent_count;
                            if ($confidence >= $confidence_threshold) {
                                $rules[] = [
                                    'antecedent' => $antecedent,
                                    'consequent' => $consequent,
                                    'confidence' => $confidence
                                ];
                            }
                        }
                    }
                }
            }
        }
        return $rules;
    }

    private function get_subsets($items)
    {
        $subsets = [];
        $num_items = count($items);
        for ($i = 1; $i < (1 << $num_items); $i++) {
            $subset = [];
            for ($j = 0; $j < $num_items; $j++) {
                if ($i & (1 << $j)) {
                    $subset[] = $items[$j];
                }
            }
            $subsets[] = $subset;
        }
        return $subsets;
    }

    private function get_count($items, $frequent_itemsets)
    {
        $k = count($items);
        $itemset = implode(',', $items);
        return isset($frequent_itemsets[$k][$itemset]) ? $frequent_itemsets[$k][$itemset] : 0;
    }
}
?>