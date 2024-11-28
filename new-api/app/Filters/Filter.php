<?php
    namespace App\Filters;

    abstract class Filter
    {
        protected $translateOperatorsFields = [];

        public function filters(Request $request) {

            $where = [];
            $whereIn = [];

            if (empty($this->allowedOperatorsFields)) {
                throw new PropertyException("Property allowedOperatorsfields is empty");
            }
        }
    }
