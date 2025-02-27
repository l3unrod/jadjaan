import React, { useState } from 'react';
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import { PieChart, Pie, BarChart, Bar, XAxis, YAxis, Tooltip, Legend, Cell, LineChart, Line } from 'recharts';
import { Filter } from 'lucide-react';

const ComprehensiveSurveyDashboard = () => {
  const [selectedNation, setSelectedNation] = useState('All');
  
  // Sample data - replace with actual data
  const data = {
    demographics: {
      ageGroups: [
        { name: '18-24', value: 30 },
        { name: '25-34', value: 45 },
        { name: '35-44', value: 25 },
        { name: '45+', value: 15 }
      ],
      genderDistribution: [
        { name: 'Male', value: 45 },
        { name: 'Female', value: 52 },
        { name: 'Other', value: 3 }
      ],
      nations: [
        { name: 'Thailand', value: 40 },
        { name: 'Japan', value: 20 },
        { name: 'USA', value: 15 },
        { name: 'Others', value: 25 }
      ],
      householdTypes: [
        { name: 'Single', value: 35 },
        { name: 'Couple', value: 25 },
        { name: 'Family', value: 30 },
        { name: 'Shared', value: 10 }
      ]
    },
    consumption: {
      frequency: [
        { name: 'Daily', value: 20 },
        { name: 'Weekly', value: 40 },
        { name: 'Monthly', value: 25 },
        { name: 'Rarely', value: 15 }
      ],
      locations: [
        { name: 'Restaurant', value: 45 },
        { name: 'Home', value: 30 },
        { name: 'Takeaway', value: 15 },
        { name: 'Street Food', value: 10 }
      ],
      cookingFrequency: [
        { name: 'Often', value: 25 },
        { name: 'Sometimes', value: 35 },
        { name: 'Rarely', value: 25 },
        { name: 'Never', value: 15 }
      ]
    },
    preferences: {
      popularDishes: [
        { name: 'Pad Thai', value: 85 },
        { name: 'Green Curry', value: 75 },
        { name: 'Tom Yum', value: 70 },
        { name: 'Som Tam', value: 65 },
        { name: 'Massaman', value: 60 }
      ],
      appeal: [
        { name: 'Taste', value: 90 },
        { name: 'Spiciness', value: 70 },
        { name: 'Health', value: 60 },
        { name: 'Price', value: 50 }
      ],
      purchaseLocations: [
        { name: 'Supermarket', value: 40 },
        { name: 'Asian Store', value: 30 },
        { name: 'Online', value: 20 },
        { name: 'Market', value: 10 }
      ]
    },
    spending: {
      willingToSpend: [
        { name: '<$10', value: 20 },
        { name: '$10-20', value: 40 },
        { name: '$20-30', value: 25 },
        { name: '>$30', value: 15 }
      ],
      brandPreference: [
        { name: 'Thai Brand', value: 45 },
        { name: 'International', value: 30 },
        { name: 'Local', value: 15 },
        { name: 'No Preference', value: 10 }
      ],
      packagingSize: [
        { name: 'Single', value: 30 },
        { name: 'Family', value: 40 },
        { name: 'Bulk', value: 20 },
        { name: 'Sample', value: 10 }
      ]
    },
    challenges: {
      cookingChallenges: [
        { name: 'Ingredients', value: 35 },
        { name: 'Time', value: 30 },
        { name: 'Skills', value: 20 },
        { name: 'Equipment', value: 15 }
      ],
      readyToCook: [
        { name: 'Very Interested', value: 40 },
        { name: 'Interested', value: 35 },
        { name: 'Neutral', value: 15 },
        { name: 'Not Interested', value: 10 }
      ]
    }
  };

  const colors = ['#d2202f', '#fac724', '#e98d26', '#2d3748', '#718096'];

  const ChartCard = ({ title, children }) => (
    <Card className="w-full">
      <CardHeader>
        <CardTitle className="text-lg">{title}</CardTitle>
      </CardHeader>
      <CardContent className="flex justify-center">
        {children}
      </CardContent>
    </Card>
  );

  const PieChartComponent = ({ data, size = 250 }) => (
    <PieChart width={size} height={size}>
      <Pie
        data={data}
        cx="50%"
        cy="50%"
        outerRadius={size/3}
        fill="#8884d8"
        dataKey="value"
        label={({name, percent}) => `${name} (${(percent * 100).toFixed(0)}%)`}
      >
        {data.map((entry, index) => (
          <Cell key={`cell-${index}`} fill={colors[index % colors.length]} />
        ))}
      </Pie>
      <Tooltip />
    </PieChart>
  );

  const BarChartComponent = ({ data, size = 250 }) => (
    <BarChart width={size} height={size} data={data}>
      <XAxis dataKey="name" />
      <YAxis />
      <Tooltip />
      <Bar dataKey="value" fill="#d2202f">
        {data.map((entry, index) => (
          <Cell key={`cell-${index}`} fill={colors[index % colors.length]} />
        ))}
      </Bar>
    </BarChart>
  );

  return (
    <div className="w-full max-w-7xl mx-auto p-4 space-y-6">
      <Card className="w-full">
        <CardHeader>
          <CardTitle className="text-2xl font-bold text-center">Thai Food Market Research Dashboard</CardTitle>
        </CardHeader>
      </Card>

      <Tabs defaultValue="demographics" className="w-full">
        <TabsList className="grid w-full grid-cols-5">
          <TabsTrigger value="demographics">Demographics</TabsTrigger>
          <TabsTrigger value="consumption">Consumption</TabsTrigger>
          <TabsTrigger value="preferences">Preferences</TabsTrigger>
          <TabsTrigger value="spending">Spending</TabsTrigger>
          <TabsTrigger value="challenges">Challenges</TabsTrigger>
        </TabsList>

        <TabsContent value="demographics" className="space-y-4">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <ChartCard title="Age Distribution">
              <PieChartComponent data={data.demographics.ageGroups} />
            </ChartCard>
            <ChartCard title="Gender Distribution">
              <PieChartComponent data={data.demographics.genderDistribution} />
            </ChartCard>
            <ChartCard title="Nationality Distribution">
              <PieChartComponent data={data.demographics.nations} />
            </ChartCard>
            <ChartCard title="Household Types">
              <PieChartComponent data={data.demographics.householdTypes} />
            </ChartCard>
          </div>
        </TabsContent>

        <TabsContent value="consumption" className="space-y-4">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <ChartCard title="Thai Food Consumption Frequency">
              <BarChartComponent data={data.consumption.frequency} />
            </ChartCard>
            <ChartCard title="Where People Eat Thai Food">
              <PieChartComponent data={data.consumption.locations} />
            </ChartCard>
            <ChartCard title="Thai Food Cooking Frequency">
              <BarChartComponent data={data.consumption.cookingFrequency} />
            </ChartCard>
          </div>
        </TabsContent>

        <TabsContent value="preferences" className="space-y-4">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <ChartCard title="Most Popular Thai Dishes">
              <BarChartComponent data={data.preferences.popularDishes} />
            </ChartCard>
            <ChartCard title="What Appeals About Thai Food">
              <BarChartComponent data={data.preferences.appeal} />
            </ChartCard>
            <ChartCard title="Where People Buy Thai Ingredients">
              <PieChartComponent data={data.preferences.purchaseLocations} />
            </ChartCard>
          </div>
        </TabsContent>

        <TabsContent value="spending" className="space-y-4">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <ChartCard title="Willing to Spend per Meal">
              <BarChartComponent data={data.spending.willingToSpend} />
            </ChartCard>
            <ChartCard title="Brand Preferences">
              <PieChartComponent data={data.spending.brandPreference} />
            </ChartCard>
            <ChartCard title="Preferred Packaging Sizes">
              <PieChartComponent data={data.spending.packagingSize} />
            </ChartCard>
          </div>
        </TabsContent>

        <TabsContent value="challenges" className="space-y-4">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <ChartCard title="Main Cooking Challenges">
              <BarChartComponent data={data.challenges.cookingChallenges} />
            </ChartCard>
            <ChartCard title="Interest in Ready-to-Cook Products">
              <PieChartComponent data={data.challenges.readyToCook} />
            </ChartCard>
          </div>
        </TabsContent>
      </Tabs>
    </div>
  );
};

export default ComprehensiveSurveyDashboard;