<?php


namespace App\Http\Filters;


abstract class BaseFilter
{
    /**
     * prefix for naming searchMethods
     * @var string
     */
    protected $methodPrefix = "where";

    protected $builder;

    protected $filtersParam;

    public function __construct($builder , $request)
    {
        $this->builder = $builder;
        $this->filtersParam = $request;
    }


    public function apply()
    {
        foreach ($this->filters() as $filter => $value){
            $filterMethod = $this->getFilterMethodName($filter);
            if(method_exists($this, $filterMethod ) && !empty($value)){
                $this->$filterMethod($value);
            }
        }
        return $this->builder;
    }

    public function filters() {
        return $this->filtersParam->all();
    }

    public function getFilterMethodName($filter){
        return $this->methodPrefix . ucfirst($filter);
    }
}