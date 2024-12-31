<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class AlbumController extends Controller
{

    // afficher les albums + image pour illustrer
    function albums()
    {
        $titre = request()->query('titre', null);
        $date = request()->query('date', 'desc');

        $sql = "
    SELECT a.id, a.titre, a.creation, 
           (SELECT url FROM photos WHERE album_id = a.id LIMIT 1) AS image_url
    FROM albums a
    WHERE 1 = 1
";
        $params = [];

        if (!empty($titre)) {
            $sql .= " AND a.titre LIKE ?";
            $params[] = '%' . $titre . '%';
        }

        if (!empty($date) && in_array(strtolower($date), ['asc', 'desc'])) {
            $sql .= " ORDER BY a.creation " . strtoupper($date);
        } else {
            $sql .= " ORDER BY a.creation DESC";
        }

        $albums = DB::select($sql, $params);


        return view("albums", ["albums" => $albums]);
    }

    // Affichage de mes albums quand connecter
    function myalbums()
    {
        $userId = Auth::id();

        $myalbums = DB::select("
            SELECT a.id, a.titre, a.creation, 
                   (SELECT url FROM photos WHERE album_id = a.id LIMIT 1) AS image_url
            FROM albums a
            WHERE a.user_id = ?
        ", [$userId]);

        return view("myalbums", ["albums" => $myalbums]);
    }

    // affichage des photos de l'album        

    //     $photos = DB::select("SELECT * FROM photos WHERE album_id = ?", [$id]);
    //     $album = DB::select("SELECT * FROM albums WHERE id = ?", [$id]);

    function album($id)
    {
        $titre = request()->query('titre', null);
        $note = request()->query('note', null);

        $sql = "SELECT * FROM photos WHERE album_id = ?";
        $params = [$id];

        if (!empty($titre)) {
            $sql .= " AND titre LIKE ?";
            $params[] = '%' . $titre . '%';
        }

        if (!empty($note)) {
            $sql .= " AND note >= ?";
            $params[] = $note;
        }

        $photos = DB::select($sql, $params);

        foreach ($photos as $photo) {
            $tags = DB::select('
                SELECT tags.nom 
                FROM tags
                JOIN possede_tag ON tags.id = possede_tag.tag_id
                WHERE possede_tag.photo_id = ?
            ', [$photo->id]);

            $photo->tags = $tags;
        }

        $album = DB::select("SELECT * FROM albums WHERE id = ?", [$id]);

        return view("album", [
            "photos" => $photos,
            "album" => $album
        ]);
    }







    // Ajout album

    function AlbumEdit(Request $request)
    {
        $titre = $request->input('titre');
        $userId = Auth::id();

        DB::insert("INSERT INTO albums (titre, creation, user_id) VALUES (?, ?, ?)", [
            $titre,
            now(),
            $userId
        ]);
        return redirect()->route('albums');
    }


    // Delete album

    public function deleteAlbum($id)
    {

        $photos = DB::select("SELECT id FROM photos WHERE album_id = ?", [$id]);

        foreach ($photos as $photo) {
            DB::delete("DELETE FROM possede_tag WHERE photo_id = ?", [$photo->id]);
        }

        DB::delete("DELETE FROM photos WHERE album_id = ?", [$id]);
        DB::delete("DELETE FROM albums WHERE id = ?", [$id]);

        return redirect()->route('albums')->with('success', 'Album supprimé avec succès.');
    }
}
