package com.teyvat.genshop.menu.pesquisa

import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.teyvat.genshop.R

class FavoritosFragment : Fragment() {
    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        return inflater.inflate(R.layout.fragment_favoritos, container, false)
    }

    companion object {
        @JvmStatic
        fun newInstance() = FavoritosFragment()
    }
}