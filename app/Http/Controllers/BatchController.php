<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chord;
use App\Lineup;
use App\LineupChord;
use App\Setting;

class BatchController extends Controller
{
    public function batchCreate(Request $request){
        foreach ($request->input('chords') as $chord) {
            Chord::create([
                'id' => $chord['id'],
                'user_id' => $chord['user_id'],
                'title' => $chord['title'],
                'chords' => $chord['chords'],
            ]);
        }

        foreach ($request->input('lineups') as $lineup) {
            Lineup::create([
                'id' => $lineup['id'],
                'user_id' => $lineup['user_id'],
                'name' => $lineup['title'],
            ]);
        }

        foreach ($request->input('lineupChords') as $lineupChord) {
            LineupChord::create([
                'id' => $lineupChord['id'],
                'user_id' => $lineupChord['user_id'],
                'lineup_id' => $lineupChord['lineup_id'],
                'chord_id' => $lineupChord['chord_id'],
            ]);
        }

        foreach ($request->input('settings') as $setting) {
            Setting::create([
                'id' => $setting['id'],
                'user_id' => $setting['user_id'],
                'setting_key' => $setting['setting_key'],
                'value' => $setting['value'],
            ]);
        }
    }

    public function batchRead()
    {
        return response()->json([
              'chords'=> Chord::all(),
              'lineups'=> Lineup::all(),
              'lineupChords'=> LineupChord::all(),
              'settings'=> Setting::all(),
        ]);
    }

    public function batchUpdate(Request $request){
        foreach ($request->input('chords') as $chord) {
            $oldChord = Chord::findOrFail($chord['id']);
            $oldChord->update($chord);
        }

        foreach ($request->input('lineups') as $lineup) {
            $oldLineup = Lineup::findOrFail($lineup['id']);
            $oldLineup->update($lineup);
        }

        foreach ($request->input('lineupChords') as $lineupChord) {
            $oldLineupChord = LineupChord::findOrFail($lineupChord['id']);
            $oldLineupChord->update($lineupChord);
        }

        foreach ($request->input('settings') as $setting) {
            $oldSetting = Setting::findOrFail($setting['id']);
            $oldSetting->update($setting);
        }
    }

    public function batchDelete(Request $request){
        foreach ($request->input('chords') as $chord) {
            $chord = Chord::findOrFail($chord['id']);
            $chord->delete();
        }

        foreach ($request->input('lineups') as $lineup) {
            $lineup = Lineup::findOrFail($lineup['id']);
            $lineup->delete();
        }

        foreach ($request->input('lineupChords') as $lineupChord) {
            $lineupChord = LineupChord::findOrFail($lineupChord['id']);
            $lineupChord->delete();
        }

        foreach ($request->input('settings') as $setting) {
            $setting = Setting::findOrFail($setting['id']);
            $setting->delete();
        }
    }


}
