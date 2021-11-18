package com.teyvat.genshop.menu.pesquisa

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.gson.JsonObject
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentPesquisaLojaBinding
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class PesquisaLojaFragment : Fragment() {
    lateinit var binding: FragmentPesquisaLojaBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaLojas = arrayListOf<Loja>()

    override fun onCreateView( inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentPesquisaLojaBinding.inflate(inflater)
        adapter = GenericRecyclerViewAdapter(listaLojas, EnumTipoLista.ListaLoja.valor)
        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(activity)

        binding.btnBuscaLoja.setOnClickListener {
            val busca = binding.editBuscaLoja.text.toString()

            requisicaoPesquisa(busca)
        }

        return binding.root
    }

    fun requisicaoPesquisa(busca: String) {
        val callback = object: Callback<List<Loja>> {
            override fun onResponse(call: Call<List<Loja>>, response: Response<List<Loja>>) {
                if(response.isSuccessful){
                    val produtos = response.body()
                    produtos?.let {
                        listaLojas.clear()
                        listaLojas.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {

                }
            }
            override fun onFailure(call: Call<List<Loja>>, t: Throwable) {
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("name", busca)
        API().loja.pesquisar(requisao).enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = PesquisaLojaFragment()
    }

}

