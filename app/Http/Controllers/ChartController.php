<?php



namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;



class ChartController extends Controller
{

    public function showCharts()
    {
        $pendingOrders   = Order::where('statuts', 'pending')->count();
        $processingOrders   = Order::where('statuts', 'processing')->count();
        $completedOrders   = Order::where('statuts', 'completed')->count();

        $chart1 = (new LarapexChart)->setTitle('Order status')
            ->setSubtitle('Some statistics')
            ->setLabels(['pending', 'processing', 'completed'])
            ->setDataset([$pendingOrders, $processingOrders, $completedOrders]);




        $chart2 = (new LarapexChart)->pieChart()
            ->setTitle('Users')
            ->setDataset([
                \App\Models\User::where('id', '<=', 10)->count(),
                \App\Models\User::where('id', '>', 10)->count()
            ])
            ->setColors(['#3383FF', '#FF3349'])
            ->setLabels(['Active users', 'Inactive users']);


        $chart3 = (new LarapexChart)->lineChart()
            ->setTitle('Users')
            ->addLine('Inactive users', \App\Models\User::query()->inRandomOrder()->limit(6)->pluck('id')->toArray())
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
            ->setColors(['#ff6384']);



        $chart4 = (new LarapexChart)->barChart()
            ->setTitle('San Francisco vs Boston.')
            ->setSubtitle('Wins during season 2021.')
            ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
            ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);



        return view('admin.dashboard', compact('chart1', 'chart2', 'chart3', 'chart4'));
    }
}
