<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    // Listar todos os banners cadastrados
    public function index()
    {
        $listaBanner = Banner::orderByDesc('id_banner')->get();

        return view('admin.banner.index', compact('listaBanner'));
    }


    // CADASTRAR BANNER: C
    public function store(Request $request){

       

        // 1- Validar os Dados
        $dados = $request->validate([
            'titulo_banner' => 'required|max:50',
            'imagem_banner' => 'required|image |mimes:jpeg,png,jpg,webp,svg,gif|max:4096',
            'status_banner' => 'required|in:ATIVO,INATIVO'
        ]);

        $caminhoArquivo = null;

        try{
             DB::beginTransaction(); 


            // 2- Cadastrar no Banco de Dados
            $banner = Banner::create([
                'titulo_banner' => $dados['titulo_banner'],
                // valor temporario

                'imagem_banner' => 'banner/sem_foto.png',
                'status_banner' => $dados['status_banner'],
            ]);


            // 3- Receber a imagem enviada
            $imagem = $request->file('imagem_banner');

            


            // 4- Criar um nome para a imagem
            // café mineiro vira cafe_mineiro_7
            $tituloimg = Str::slug($dados['titulo_banner']);

            // 5- pegar extensão do arquivo
            $extensao = strtolower($imagem->getClientOriginalExtension());

            // 6- Montar o nome final da imagem

            $nomeImg = $tituloimg . '_' . $banner->id_banner . '.' . $extensao;

            // 7- Salvar a imagem na pasta do projeto
            $pasta = public_path('barista/assets/banner');

            // 8- se a pasta não existir, criar a pasta
            if(!is_dir($pasta)){
                mkdir($pasta, 0775, true);
            }

            // 9- Mover a imagem para a pasta
            $imagem->move($pasta, $nomeImg);


            $caminhoArquivo = $pasta . DIRECTORY_SEPARATOR . $nomeImg;

            // 10 - Atualizar o registro do banner com o caminho da imagem
            $banner->imagem_banner = 'banner/' . $nomeImg;
            $banner->save();

            DB::commit();

 
            // 11- Montar e enviar uma mensagem
            return redirect()->route('admin.banner.index')
            ->with('sucesso', 'Banner: ' . $banner->titulo_banner . ' foi cadastrado com sucesso!');
        


        }catch(\Throwable $erro){
            
            DB::rollBack();

            // Se a imagem foi salva, apagar a imagem
            if($caminhoArquivo && file_exists($caminhoArquivo)){
                unlink($caminhoArquivo);
            }

           report($erro);

            return redirect()
            ->back()
            ->withinput()
            ->with('erro', 'Não foi possível cadastrar o banner. tente outra vez mais tarde!');


        }

       

       
    }

    
    // ATUALIZAR BANNER: U
     public function update(Request $request, int $id)
    {

        // 1 - Validar os dados
        $dados = $request->validate([
            'titulo_banner' => 'required|max:50',
            'imagem_banner' => 'nullable|image|mimes:jpg,png,webp,jpeg|max:4096',
            'status_banner' => 'required|in:ATIVO,INATIVO'
        ]);

        // 2 - Buscar o banner
        $banner = Banner::findOrFail($id);

        try {

            // Titulo atual
            $tituloSlug = Str::slug($dados['titulo_banner']);

            // O nome da pasta
            $pasta = public_path('barista/assets/banner');

            // O caminho salvo no banco
            $caminhoArquivo = $banner->imagem_banner;

            // Caminho físico da imagem atual
            $imgAntiga = public_path('barista/assets' . $banner->imagem_banner);

            // CASO 1: NOVA IMAGEM
            if ($request->hasFile('imagem_banner')) {

                $imagem = $request->file('imagem_banner');

                $extensao = strtolower($imagem->getClientOriginalExtension());

                $nomeImg = $tituloSlug . '_' . $banner->id_banner . '.' . $extensao;

                // Excluir a imagem anterior
                if (file_exists($imgAntiga)) {
                    unlink($imgAntiga);
                }

                // Salva a nova imagem
                $imagem->move($pasta, $nomeImg);

                $caminhoArquivo = 'banner/' . $nomeImg;
            } elseif ($banner->titulo_banner !== $request->titulo_banner) {
                // CASO 2 - MUDOU SOMENTE O NOME

                $extensao = pathinfo($banner->titulo_banner, PATHINFO_EXTENSION);

                $nomeImg = $tituloSlug . '_' . $banner->id_banner . '.' . $extensao;

                $novaImagem = public_path('barista/assets/banner/' . $nomeImg);

                if (file_exists($imgAntiga)) {

                    rename(
                        $imgAntiga,
                        $novaImagem
                    );

                    $caminhoArquivo = 'banner/' . $nomeImg;
                }
            }

            // ATUALIZA NO BANCO
            $banner->update([
                'titulo_banner' => $dados['titulo_banner'],
                'imagem_banner' => $caminhoArquivo,
                'status_banner' => $dados['status_banner'],
            ]);

            // Voltar para a listagem
            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', 'Banner: ' . $banner->titulo_banner . ' foi atualizado com sucesso!');
        } catch (\Throwable $erro) {

            report($erro);

            return redirect()
                ->back()
                ->with('erro', 'Não foi possível atualizar o banner. Tente mais tarde!');
        }
    } // FIM DA METODO UPDATE

    // ATIVAR e DESATIVAR o BANNER - D (U)
    public function status(Request $request, int $id)
    {

        try {

            $banner = Banner::findOrFail($id);

            $novoStatus = $banner->status_banner === 'ATIVO' ? 'INATIVO' : 'ATIVO';

            // if($banner->status_banner === 'ATIVO'){
            //     $novoStatus = 'INATIVO';
            // }else{
            //     $novoStatus = 'ATIVO';
            // }

            // ATUALIZA NO BANCO
            $banner->update([
                'status_banner' => $novoStatus,
            ]);

            $mensagem = $novoStatus === 'ATIVO' ? 'Banner ativado com sucesso' : 'Banner desativado com sucesso';

            // Voltar para a listagem
            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', $mensagem);


        } catch (\Throwable $erro) {

            report($erro);

            return redirect()
                ->back()
                ->with('erro', 'Não foi possível alterar o status do banner. Tente mais tarde!');
        }
    }





}





        
    


    



