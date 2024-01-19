import React, { useEffect, useContext, useState } from 'react'
import {
  Text,
  View,
  StyleSheet,
  ScrollView,
  Image,
  TouchableOpacity,
} from 'react-native'
import ScreenTemplate from '../../components/ScreenTemplate'
import Button from '../../components/Button'
import { colors, fontSize } from 'theme'
import { ColorSchemeContext } from '../../context/ColorSchemeContext'
import { UserDataContext } from '../../context/UserDataContext'
import { useNavigation } from '@react-navigation/native'
import TextInputBox from '../../components/TextInputBox'
import Headerlogo from '../../components/Headerlogo'
import { visa, jnt, jne, serum } from '../../../assets'

export default function keranjang() {
  const navigation = useNavigation()
  const [input, setInput] = useState('')
  const { userData } = useContext(UserDataContext)
  const { scheme } = useContext(ColorSchemeContext)
  const isDark = scheme === 'dark'
  const colorScheme = {
    text: isDark ? colors.white : colors.primaryText,
  }

  useEffect(() => {
    console.log('pesanan screen')
  }, [])

  const buttonPress = () => {
    navigation.navigate('Follow')
    // console.log('button press')
  }

  return (
    <ScreenTemplate>
      <Headerlogo />
      <View style={{ alignItems: 'center', paddingVertical: 20 }}>
        <Text
          style={{
            color: colors.warnaFont,
            fontSize: 30,
            textTransform: 'uppercase',
            fontWeight: 'bold',
          }}
        >
          Pesanan Saya
        </Text>
      </View>
      <ScrollView style={styles.main}>
        <View
          style={[
            styles.cardContain,
            { paddingHorizontal: 20, paddingVertical: 20 },
          ]}
        >
          <Image source={serum} style={{ marginLeft: 25 }} />
          <View style={{ flexDirection: 'column', marginTop: 20 }}>
            <Text
              style={[
                styles.marginbot,
                {
                  textTransform: 'uppercase',
                  fontWeight: 'bold',
                  fontSize: 15,
                },
              ]}
            >
              Serum
            </Text>
            <Text style={{ marginTop: 10 }}>Rp.125.000,00</Text>
            <Text style={{ marginTop: 10 }}>Jumlah : 1</Text>
            <Text style={{ marginTop: 10 }}>
              Status :<Text style={{ fontWeight: 'bold' }}>dibayar</Text>
            </Text>
          </View>
        </View>
        <View
          style={[
            styles.cardContain,
            { paddingHorizontal: 20, paddingVertical: 20 },
          ]}
        >
          <Image source={serum} style={{ marginLeft: 25 }} />
          <View style={{ flexDirection: 'column', marginTop: 20 }}>
            <Text
              style={[
                styles.marginbot,
                {
                  textTransform: 'uppercase',
                  fontWeight: 'bold',
                  fontSize: 15,
                },
              ]}
            >
              Serum
            </Text>
            <Text style={{ marginTop: 10 }}>Rp.125.000,00</Text>
            <Text style={{ marginTop: 10 }}>Jumlah : 1</Text>
            <Text style={{ marginTop: 10 }}>
              Status :<Text style={{ fontWeight: 'bold' }}>dibayar</Text>
            </Text>
          </View>
        </View>
        <View
          style={[
            styles.cardContain,
            { paddingHorizontal: 20, paddingVertical: 20 },
          ]}
        >
          <Image source={serum} style={{ marginLeft: 25 }} />
          <View style={{ flexDirection: 'column', marginTop: 20 }}>
            <Text
              style={[
                styles.marginbot,
                {
                  textTransform: 'uppercase',
                  fontWeight: 'bold',
                  fontSize: 15,
                },
              ]}
            >
              Serum
            </Text>
            <Text style={{ marginTop: 10 }}>Rp.125.000,00</Text>
            <Text style={{ marginTop: 10 }}>Jumlah : 1</Text>
            <Text style={{ marginTop: 10 }}>
              Status :
              <Text
                style={{
                  fontWeight: 'bold',
                  color: colors.warnaFont,
                }}
              >
                pending
              </Text>
            </Text>
          </View>
        </View>
        <View style={{ paddingBottom: 30 }}>
          <Button
            label="Kembali ke Produk"
            color={colors.warnaFont}
            onPress={() => buttonPress()}
          />
        </View>
      </ScrollView>
    </ScreenTemplate>
  )
}

const styles = StyleSheet.create({
  main: {
    flex: 1,
    width: '100%',
  },
  totalContain: {
    flexDirection: 'row',
    backgroundColor: '#DD7272',
    paddingVertical: 40,
    justifyContent: 'space-between',
    alignItems: 'center',
  },
  container: {
    flexDirection: 'row',
    alignItems: 'center',
  },

  cardContain: {
    display: 'flex',
    flexDirection: 'row',
    backgroundColor: '#D3ABAB',
    marginBottom: 20,
  },
  button: {
    fontSize: 20,
    padding: 6,
    borderWidth: 1,
    borderColor: 'black',
    borderRadius: 5,
    marginHorizontal: 5,
  },
  marginbot: {
    marginBottom: 10,
  },
})
