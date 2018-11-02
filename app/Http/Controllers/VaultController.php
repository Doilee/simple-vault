<?php

namespace App\Http\Controllers;

use App\ActionLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Entry;

/**
 * Class VaultController
 * @package App\Http\Controllers
 */
class VaultController extends Controller
{
    /**
     * Create an entry.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateInput($request);

        $entry = new Entry();

        $entry->url         = $request->get('url');
        $entry->username    = $request->get('username');
        $entry->password    = encrypt($request->get('password'));
        $entry->author_id   = $request->user()->id;

        if ($entry->save())
        {
            $this->logAction($request, $entry, 'create', 'success');

            return redirect()->action('HomeController@index', [
                'request' => $request
            ]);
        };

        $this->logAction($request, $entry, 'create', 'failure');

        return redirect()->back()
            ->withErrors([
                'create' => 'Failed to create entry',
            ]);
    }

    /**
     * Update an entry.
     *
     * @param Request $request
     * @param Entry $entry
     *
     * @return RedirectResponse
     * @internal param $id
     */
    public function update(Request $request, Entry $entry)
    {
        $this->validateInput($request);

        $entry->url         = $request->get('url');
        $entry->username    = $request->get('username');
        $entry->password    = encrypt($request->get('password'));
        $entry->author_id   = $request->user()->id;

        if (!is_null($entry->save()) )
        {
            $this->logAction($request, $entry, 'update', 'success');

            return redirect()->action('HomeController@index', [
                'request' => $request
            ]);
        };

        $this->logAction($request, $entry, 'update', 'failure');

        return redirect()->back()
            ->withErrors([
                'update' => 'Failed to update entry',
            ]);
    }

    /**
     * Delete an entry.
     *
     * @param Request $request
     * @param Entry $entry
     *
     * @return RedirectResponse
     * @internal param int $id
     */
    public function destroy(Request $request, Entry $entry)
    {
        if ($entry->delete())
        {
            $this->logAction($request, $entry, 'delete', 'success');

            return redirect()->action('HomeController@index', [
                'request' => $request
            ]);
        };

        $this->logAction($request, $entry, 'delete', 'failure');

        return redirect()->back()
            ->withErrors([
                'delete' => 'Could not delete entry',
            ]);
    }

    /**
     * Validate the user input.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateInput(Request $request)
    {
        $this->validate($request, [
            'url'      => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|min:6|max:255',
        ]);
    }

    /**
     * Log the called method to the database.
     *
     * @param Request $request
     * @param Entry $entry
     * @param string $type
     * @param string $result
     */
    protected function logAction(Request $request, Entry $entry, $type, $result)
    {
        $actionLog = new ActionLog();

        $actionLog->user_id  = $request->user()->id;
        $actionLog->entry_id = $entry->id;
        $actionLog->action   = $type;
        $actionLog->result   = $result;

        $actionLog->save();
    }

}
