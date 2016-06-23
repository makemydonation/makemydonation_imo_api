<?php
namespace MakemydonationImo;

class FuneralHome extends MakemydonationImoApi
{
    /**
     * Get a list of available funeral homes.
     */
    public function index()
    {
        $this->request('get', 'funeral_home');
    }

    /**
     * Retrieve a single funeral home by id.
     *
     * @param integer id
     */
    public function retrieve($id)
    {
        $this->request('get', "funeral_home/$id");
    }

    /**
     * Create a funeral home.
     *
     * @param integer id
     * @param array data
     */
    public function create($data)
    {
        $this->request('post', 'funeral_home', $data);
    }

    /**
     * Update a funeral home.
     *
     * @param integer id
     * @param array data
     */
    public function update($id, $data)
    {
        $this->request('put', "funeral_home/$id", $data);
    }
}
