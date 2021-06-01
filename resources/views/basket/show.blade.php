@extends("layouts.master")
@section("content")
<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if (session()->has("basket"))
    <h1>Mon panier</h1>
    <div class="table-responsive shadow mb-3">
        <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                <!-- Initialisation du total général à 0 -->
                @php $total = 0 @endphp

                <!-- On parcourt les produits du panier en session : session('basket') -->
                @foreach (session("basket") as $key => $item)

                <!-- On incrémente le total général par le total de chaque produit du panier -->
                @php $total += $item['price'] * $item['quantity'] @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <strong><a href="{{ url('/products', $key) }}"
                                title="Afficher le produit">{{ $item['title'] }}</a></strong>
                    </td>
                    <td>{{ $item['price'] }} dh</td>
                    <td>
                        <!-- Le formulaire de mise à jour de la quantité -->
                        <form method="POST" action="{{ route('basket.add', $key) }}" class="form-inline d-inline-block">
                            {{ csrf_field() }}
                            <input type="number" name="quantity" placeholder="Quantité ?"
                                value="{{ $item['quantity'] }}" class="form-control mr-2" style="width: 80px">
                            <input type="submit" class="btn btn-primary" value="Actualiser" />
                        </form>
                    </td>
                    <td>
                        <!-- Le total du produit = prix * quantité -->
                        {{ $item['price'] * $item['quantity'] }} Dh
                    </td>
                    <td>
                        <!-- Le Lien pour retirer un produit du panier -->
                        <a href="{{ route('basket.remove', $key) }}" class="btn btn-outline-danger"
                            title="Retirer le produit du panier">Retirer</a>
                    </td>
                </tr>
                @endforeach
                <form method="POST" action="{{ route('checkout.index') }}" class="form-inline d-inline-block">
                    {{ csrf_field() }}
                    <tr colspan="2">
                        <td colspan="4">Total général</td>
                        <td colspan="1">
                            <!-- On affiche total général -->
                            <input value="{{ $total}}" name="total" type="text" class="form-control"
                                placeholder="total...">
                        </td>
                        <td> <button type="submit" style="margin-top:30px; border-raduis:30%"
                                class="btn btn-warning">Commander</button>
                        </td>
                    </tr>
                </form>
            </tbody>

        </table>


    </div>
    <div class="form-group-row ">
        <!-- Lien pour vider le panier -->
        <a class="btn btn-danger" href="{{ route('basket.empty') }}" title="Retirer tous les produits du panier">Vider
            le panier</a>
        <a class="btn btn-default" href="{{ route('home') }}" title="continuer achats" style="margin-left:60% ;"><i
                class="fas fa-arrow-right"></i> Continuer mes achats</a>

    </div>




    {{-- last version of promo --}}
    <div class="row p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Code coupon
            </div>
            @if (!request()->session()->has('coupon'))
            <div class="p-4">
                <p class="font-italic mb-4">Si vous détenez un code Coupon, entrez-le dans le champ ci-dessous</p>
                <form action="{{ url('/cart/apply-coupon') }}" method="POST">
                    @csrf
                    <input type="text" style="visibility:hidden" name="total" value="{{ $total }}">
                    <div class="input-group mb-4 border rounded-pill p-2">

                        <input type="text" placeholder="Entrez votre code ici" name="code"
                            aria-describedby="button-addon3" class="form-control border-0">
                        <div class="input-group-append border-0">
                            <button id="button-addon3" type="submit" class="btn btn-dark px-4 rounded-pill"><i
                                    class="fa fa-gift mr-2"></i>Appliquer le coupon</button>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="p-4">
                <p class="font-italic mb-4">Un coupon est déjà appliqué.</p>
            </div>
            @endif
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions pour le vendeur
            </div>
            <div class="p-4">
                <p class="font-italic mb-4">Si vous souhaitez ajouter des précisions à votre commande, merci de les
                    rentrer dans le champ ci-dessous</p>
                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
            </div>
        </div>

        @else
        <div class="alert alert-info">Aucun produit au panier</div>
        @endif


        {{-- last version of promo --}}
        <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande
            </div>
            <div class="p-4">
                <p class="font-italic mb-4">Les frais éventuels de livraison seront calculés suivant les informations
                    que vous avez transmises.</p>
                <ul class="list-unstyled mb-4">
                    {{-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total
                        </strong><strong>{{ $total }}</strong></li> --}}
                    @if (request()->session()->has('coupon'))
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Coupon
                            {{ request()->session()->get('coupon')['code'] }}

                            <form action="{{ route('basket.destroy.coupon') }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </strong><strong>{{ request()->session()->get('coupon')['remise'] }}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nouveau
                            total</strong><strong>
                            {{ $total - request()->session()->get('coupon')['remise']}}
                        </strong>
                    </li>
                    @endif
                </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block"><i class="fa fa-credit-card"
                        aria-hidden="true"></i>
                    Passer à la caisse</a>
            </div>
        </div>
    </div>

    @endsection

