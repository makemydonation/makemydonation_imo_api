<?php
namespace MakemydonationImo;

class FuneralHomeCase extends MakemydonationImoApi
{
    /**
     * Get a list of available funeral home cases.
     */
    public function index()
    {
        $this->request('get', 'case');
    }

    /**
     * Retrieve a single funeral home case by id.
     *
     * @param integer id
     */
    public function retrieve($id)
    {
        $this->request('get', "case/$id");
    }

    /**
     * Create a funeral home case.
     *
     * @param integer id
     * @param array data
     */
    public function create($data)
    {
        $this->request('post', 'case', $data);
    }

    /**
     * Update a funeral home case.
     *
     * @param integer id
     * @param array data
     */
    public function update($id, $data)
    {
        $this->request('put', "case/$id", $data);
    }
}
